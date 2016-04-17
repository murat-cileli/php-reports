# PHP Reports Documentation
PHP-Reports is a cloud based, interactive report engine which helps in generating well formatted PDF reports from Word / DOCX templates in PHP, ASP.NET, ASP.NET MVC, WPF, Silverlight, WinRT, HTML5, Windows Forms, Java, Python, Objective-C, Swift, Delphi and other languages as well.

Read most up-to-date documentation at https://www.php-reports.com/documentation

#1. Getting API Key
Create free account at https://www.php-reports.com and get your free API Key.

#2. Creating Your First Template
To accelerate the process of creating your reports and applications, PHP Reports takes advantage of Microsoft Word's design capabilites. Simply create a Microsoft Word file and design your report.

#3. Using Template Variables
You can use template variables in your Word template. Tamplate variables take their name from the contents of their double curly braces and they can later be replaced with a concrete value.

All template variable names within a template string must be unique. Template variable names are case-insensitive.

Examples of valid template strings:

* {{client_name}}
* {{email_address}}
* {{products}}

#4. Upload Your Template
Save and upload your teamplate at "Template Manager" section in https://www.php-reports.com

#5. Include PHPReports.php Class to Your Project
Download https://github.com/murat-cileli/php-reports or install via Composer.
```php
composer require murat-cileli/php-reports
```

#6. Generating Reports
You can assign a single value or an array to template variable. Templates variables that have multiple values, will be seperated by linebreaks in your generated report.

```php
$pr = new PHPReports('f9nb3k8bzfumne6g6yu6fu4d');
$pr->setTemplateId(2);
$pr->setOutputFileType(PHPReports::OUTPUT_PDF);
$pr->setOutputAction(PHPReports::ACTION_GET_DOWNLOAD_URL);
$pr->setOutputFileName('My_Generated_Report.pdf');
$pr->setTemplateVariables(
    array(
        'client_name' => 'Armut Inc.',
        'email_address'      => 'murat.cileli@gmail.com',
        'products'     => array('Computer', 'Smart Phone', 'Book')
    ));
```

Finally, generate your report using single line of code.

```php
$pr->generateReport();
```
