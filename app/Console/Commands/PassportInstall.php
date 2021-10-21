<?php

namespace App\Console\Commands;

use Laravel\Passport\Console\InstallCommand;
use Laravel\Passport\Passport;

class PassportInstall extends InstallCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'passport:installOnly
                            {--migration= : Use migration for multiple connections}
                            {--provider= : Use provider for multiple connections}
                            {--uuids : Use UUIDs for all client IDs}
                            {--force : Overwrite keys they already exist}
                            {--length=4096 : The length of the private key}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run the commands necessary to prepare Passport for use';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $providerName = $this->option('provider');
        $migration = $this->option('migration');
        config([
            'passport.storage.database.connection' => $migration,
            'database.default' => $migration,
        ]);
        $provider = array_key_exists($providerName, config('auth.providers')) ? $this->option('provider') : null;

        $this->call('passport:keys', ['--force' => $this->option('force'), '--length' => $this->option('length')]);

        if ($this->option('uuids')) {
            $this->configureUuids();
        }

        $this->call('passport:client', ['--personal' => true, '--name' => $migration . ' Personal Access Client']);
        $this->call('passport:client', ['--password' => true, '--name' => $migration . ' Password Grant Client', '--provider' => $provider]);
    }

    /**
     * Configure Passport for client UUIDs.
     *
     * @return void
     */
    protected function configureUuids()
    {
        $migration = $this->option('migration');
        $this->call('vendor:publish', ['--tag' => 'passport-config']);
        $this->call('vendor:publish', ['--tag' => 'passport-migrations']);

        config(['passport.client_uuids' => true]);
        Passport::setClientUuids(true);

        $this->replaceInFile(config_path('passport.php'), '\'client_uuids\' => false', '\'client_uuids\' => true');
        $this->replaceInFile(database_path('migrations/' . $migration . '/2016_06_01_000001_create_oauth_auth_codes_table.php'), '$table->unsignedBigInteger(\'client_id\');', '$table->uuid(\'client_id\');');
        $this->replaceInFile(database_path('migrations/' . $migration . '/2016_06_01_000002_create_oauth_access_tokens_table.php'), '$table->unsignedBigInteger(\'client_id\');', '$table->uuid(\'client_id\');');
        $this->replaceInFile(database_path('migrations/' . $migration . '/2016_06_01_000004_create_oauth_clients_table.php'), '$table->bigIncrements(\'id\');', '$table->uuid(\'id\')->primary();');
        $this->replaceInFile(database_path('migrations/' . $migration . '/2016_06_01_000005_create_oauth_personal_access_clients_table.php'), '$table->unsignedBigInteger(\'client_id\');', '$table->uuid(\'client_id\');');

        if ($this->confirm('In order to finish configuring client UUIDs, we need to rebuild the Passport database tables. Would you like to rollback and re-run your last migration?')) {
            $this->call('migrate:rollback  --path=/database/migrations/' . $migration);
            $this->call('migrate  --path=/database/migrations/' . $migration);
            $this->line('');
        }
    }

    protected function replaceInFile($path, $search, $replace)
    {
        file_put_contents(
            $path,
            str_replace($search, $replace, file_get_contents($path))
        );
    }

}
