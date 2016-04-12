# PHP Reports Documentation
PHP-Reports is a report engine which helps in generating well formatted PDF reports from Word / DOCX templates in PHP and other languages as well.

#1. Getting API Key
Create free account at https://www.php-reports.com and get your free API Key.

#2. Creating Your First Template
Create a blank Microsoft Word file and design your page.

#3. Using Template Variables
You can use template variables in your Word template. Tamplate variables take their name from the contents of their double curly braces and they can later be replaced with a concrete value.

All template variable names within a template string must be unique. Template variable names are case-insensitive.

Examples of valid template strings:

* {{client_name}}
* {{email_address}}
* {{products}}

#4. Upload Your Template
Save and upload your teamplte at "Template Manager" section in https://www.php-reports.com

#5. Include PHPReports.php Class to Your Project
Download https://github.com/murat-cileli/php-reports or install via Composer.

#6. Generating Reports
You can pass values to template variables and generate your report in few line a code. 

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
        'client_name'  => 'Murat Çileli',
        'products'     => array('Computer', 'Smart Phone', 'Book')
    ));
```
