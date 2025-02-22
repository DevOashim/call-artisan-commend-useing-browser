# Call Artisan Commands Using Browser
This project allows you to execute Laravel Artisan commands directly from your browser. It provides a user-friendly interface to run commands like migrate, cache:clear, make:controller, and more.

## Features

- Execute Artisan commands from the browser.

- Dark and light mode support.

- Auto-suggestions for commands.

- Shortcut buttons for common commands.

- Organized accordion sections for different command categories.
## Usage

Visit http://127.0.0.1/cmd in your browser to access the Artisan Commands interface.

Use the form to run custom commands or click on shortcut buttons for common commands.

## Setup Instructions
### Update web.php | Add the following routes to your routes/web.php file:
```php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

// Display the Artisan Commands interface
Route::view('/cmd', 'cmd')->name('cmd');

Route::post('custom', function (Request $request) {
    if (isset($request->name)) {
        Artisan::call($request->name);
    } elseif (isset($request->make)) {
        $make = 'make:' . $request->make;
        Artisan::call($make);
    } else {
        return redirect()->back()->with('status', 'Please enter a command');
    }
    return redirect()->back()->with('status', Artisan::output());
})->name('customCmd');

Route::get('/cmd/{command}', function ($command) {
    Artisan::call($command);
    return redirect()->back()->with('status', Artisan::output());
})->name('cmd.call');
```
###  Add cmd.blade.php  file cmd.blade.php in the resources/views directory 

## Contributing
Feel free to contribute to this project by submitting issues or pull requests.

## License
This project is open-source and available under the MIT License.
