<?php
use Illuminate\Support\Facades\File;

if (!function_exists('uploadFile')) {
    /**
     * Upload a file to a specified folder and return the file path.
     *
     * @param \Illuminate\Http\UploadedFile $file The file to upload.
     * @param string $folder The folder where the file will be stored.
     * @param string|null $name Optional custom file name (without extension).
     * @return string The relative path of the uploaded file.
     */
    function uploadFile($file, $folder, $name = null)
    {
        $path = public_path($folder);

        // Ensure the directory exists
        if (!File::exists($path)) {
            File::makeDirectory($path, 0775, true, true);
        }

        // Generate a unique file name if not provided
        $filename = $name
            ? $name . '.' . $file->getClientOriginalExtension()
            : time() . '_' . $file->getClientOriginalName();

        // Move the file to the desired folder
        $file->move($path, $filename);

        // Return the relative path
        return $folder . '/' . $filename;
    }
}

if (!function_exists('can')) {

    function can($key)
    {
        $group_id = auth()->user()->group_id;
        $permissions = \App\Models\RollHas::where('roll_id', $group_id)
            ->join('permissions', 'roll_has.permission_id', '=', 'permissions.id')
            ->select('permissions.key')
            ->get()
            ->pluck('key')
            ->toArray();
        if (in_array($key, $permissions)) {
            return true;
        }
        return false;
    }
}
// if (!function_exists('get_select')) {

//     /**
//      * Retrieve a key-value pair (usually id and name) from a model.
//      *
//      * @param string $model The model to query.
//      * @param int $id The id of the item to retrieve.
//      * @param string $name The name of the column to retrieve.
//      * @return \Illuminate\Support\Collection The key-value pair.
//      */
//     function get_select(string $model, string $id, string $name): \Illuminate\Support\Collection
//     {
//         return app()->make($model)->pluck($name, $id);
//     }
// }

