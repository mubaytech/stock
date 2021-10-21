<?php

namespace App\GraphQL\Mutations;

use App\Models\Tenant\FileModel;
use File;
use Illuminate\Http\UploadedFile;
use Intervention\Image\Facades\Image;
use Storage;
use Str;
use Tenancy\Facades\Tenancy;

class UploadFile
{
    /**
     * @param null $_
     * @param array<string, mixed> $args
     */
    public function __invoke($_, array $args): ?FileModel
    {
        /**
         * @var UploadedFile $file
         */
        $id = $args['id'];
        $file = $args['file'];

        $disk = Storage::disk('public');
        $path = 'files';
        if (Tenancy::isIdentified()) {

//            $disk = Storage::disk('tenant_public');
        }
        $file_extension = $file->getClientOriginalExtension();
        $file_name = Str::random(40);

        if ($this->isImage($file->path())) {


            $path = $path . '/' . 'images';


            $disk->putFileAs(
                $path,
                $file,
                $file_name . '.' . $file_extension
            );
//            throw new \Exception($disk->path($path) . $file_name . '_Small.' . $file_extension);
            Image::make($file->getRealPath())->resize(
                200,
                200,
                static function ($constraint) {
                    $constraint->aspectRatio();
                }
            )->save($disk->path($path) . DIRECTORY_SEPARATOR . $file_name . '_Small.' . $file_extension);
            return FileModel::updateOrCreate(
                ['id' => $id],
                [
                    'nom' => $file_name,
                    'path' => $disk->path(
                        $path . DIRECTORY_SEPARATOR . $file_name . '.' . $file_extension
                    ),
                    'url' => $disk->url(
                        $path . '/' . $file_name . '.' . $file_extension
                    ),
                    'thumbnail_path' => $disk->path(
                        $path . DIRECTORY_SEPARATOR . $file_name . '_Small.' . $file_extension
                    ),
                    'thumbnail_url' => $disk->url(
                        $path . '/' . $file_name . '_Small.' . $file_extension
                    ),
                    'type' => $file->getType(),
                    'exist' => true
                ],
            );

        } else {
            $disk->putFileAs($path, $file, $file_name . '.' . $file_extension);
            return FileModel::updateOrCreate(
                ['id' => $id,],
                [
                    'nom' => $file_name,
                    'path' => $disk->path(
                        $path . DIRECTORY_SEPARATOR . $file_name . '.' . $file_extension
                    ),
                    'url' => $disk->url(
                        $path . '/' . $file_name . '.' . $file_extension
                    ),
                    'type' => $file->getType()
                ]
            );
        }


    }

    public function createDirecrotory($path)
    {
        if (!File::isDirectory($path)) {
            File::makeDirectory($path, 0777, true, true);
        }
        return $path;
    }

    public function isImage($path)
    {
        $allowedMimeTypes = ['image/jpeg', 'image/jpg', 'image/gif', 'image/png', 'image/bmp', 'image/svg+xml'];
        $contentType = mime_content_type($path);
        return in_array($contentType, $allowedMimeTypes);
    }

}
