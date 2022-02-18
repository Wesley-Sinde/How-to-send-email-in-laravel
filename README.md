<h1 align="center">Laravel Send Email Example.</h1>

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://laratutorials.com/wp-content/uploads/2020/09/Laravel-8-Send-Email-Example.jpeg" width="400"></a></p>



This example is focused on send email in laravel . you'll learn laravel  send mail example smtp. if you have question about laravel send email smtp example then i will give simple example with solution. We will look at example of laravel send mail example.

I will exmplain how to send mail in laravel .We will show full example of send send mail in laravel. Do you want to send email using smtp in laravel? if yes then i will guide you to laravel send mail example using smtp driver. i will give you simple example of how to send mail in laravel using Mail class. you can also use google gmail driver for sending email in laravel.

We will give you step by step instruction to send email in laravel 6. you can create blade file design and also with dynamic information for mail layout. so let's see step by step guide and send email to your requirement .

Step: 1 Install Laravel


In this step, if you haven't laravel application setup then we have to get fresh laravel 7 application. So run bellow command and get clean fresh laravel 7 application
```php
composer create-project --prefer-dist laravel/laravel blog
```
After you have to add send mail configuration with mail driver, mail host, mail port, mail username, mail password so laravel 6 will use those sender details on email. So you can simply add as like following.


.env
```php
MAIL_DRIVER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=yourgoogle@gmail.com
MAIL_PASSWORD=rrnnucvnqlbsl
MAIL_ENCRYPTION=tls
```
Step 2: Create Mail

In this step we will create mail class MyTestMail for email sending. Here we will write code for which view will call and object of user. So let's run bellow command.
```php
php artisan make:mail MyDemoMail
```
app/Mail/MyDemoMail.php
```php
<?php
  
namespace App\Mail;
   
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
  
class MyDemoMail extends Mailable
{
    use Queueable, SerializesModels;
  
    public $details;
   
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }
   
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Mail from wesley.io.ke')
                    ->view('myDemoMail');
    }
}
```
Step 3: Create Blade View

In this step, we will create blade view file and write email that we want to send. now we just write some dummy text. create bellow files on "emails" folder.


resources/views/myDemoMail.blade.php
```php
<!DOCTYPE html>
<html>
<head>
    <title>Wesley.io.ke Mail Demo</title>
</head>
<body>
    <h1>{{ $details['title'] }}</h1>
    <p>{{ $details['body'] }}</p>
    <p>Thank you</p>
</body>
</html>
```
Step 4: Add Route

Now at last we will create "myDemoMail" for sending our test email. so let's create bellow web route for testing send email.
```php
routes/web.php

routes/web.php

Route::get('send-mail', function () {
   
    $details = [
        'title' => 'Mail from wesley.io.ke',
        'body' => 'This is for testing email using smtp'
    ];
   
    \Mail::to('your_receiver_email@gmail.com')->send(new \App\Mail\MyDemoMail($details));
   
    dd("Email is Sent.");
});
```
Now we are ready to run our example so run bellow command ro quick run:
```php
php artisan serve
```
Now you can open bellow url on your browser:
```php

http://localhost:8000/send-mail

```