Table of contents

CONTENTS OF THIS FILE
---------------------
 * Installation
 * Configuration



INSTALLATION
------------
 1. Copy file MillionDollar.zip into your project directory.
 2. Unzip.
 3. Create a new database. Import our SQL file into your database.


CONFIGURATION
-------------
 1. Open file 'config.php' at your project directory.
 2. Change info in this file by your info.
    * Example: 
		define('BASE_HTTP_PATH', 'http://localhost/MillionDollarScript_p22/'); 
		define('SERVER_PATH_TO_ADMIN', 'D:/PHP/Xampp/htdocs/MillionDollarScript_p22/admin/');
		define('UPLOAD_PATH', 'D:/PHP/Xampp/htdocs/MillionDollarScript_p22/upload_files/');
		define('UPLOAD_HTTP_PATH', 'http://localhost/MillionDollarScript_p22/upload_files/');
		define('MYSQL_HOST', 'localhost'); # mysql database host
		define('MYSQL_USER', 'root'); #mysql user name
		define('MYSQL_PASS', ''); # mysql password
		define('MYSQL_DB', 'p22_milliondollar'); # mysql database name
		
	You can change by: 
		define('BASE_HTTP_PATH', 'your_base_http_path'); 
		define('SERVER_PATH_TO_ADMIN', 'your_server_path/admin/');
		define('UPLOAD_PATH', 'your_server_path/upload_files/');
		define('UPLOAD_HTTP_PATH', 'your_base_http_path/upload_files/');
		define('MYSQL_HOST', 'your_host'); # mysql database host
		define('MYSQL_USER', 'Your_database_username'); #mysql user name
		define('MYSQL_PASS', 'Your_database_password'); # mysql password
		define('MYSQL_DB', 'Data Base Name'); # mysql database name

 3. Config BLOG PAGE.
	3.1 Open file 'wp_config.php' in folder 'Your_project_directory/blog'
		* Change info in this file by your info.
		
			define('DB_NAME', 'Data Base Name');
			
			define('DB_USER', 'Your_database_username');

			define('DB_PASSWORD', 'Your_database_password');

			define('DB_HOST', 'your_host');

			define('URL', 'YOUR_BASE_HTTP_PATH');
 
	3.2 Run file 'searchreplacedb2.php' by enter this link: YOUR_BASE_HTTP_PATH/blog/searchreplacedb2.php.
		* STEP 1 - Click SUBMIT BUTTON.
		* STEP 2 - Check your database info. IF it OK, click BUTTON 'Submit DB Details'. IF NOT, fix it then click BUTTON 'Submit DB Details'.
		* STEP 3 - Choose all tables has prefix 'wp_' to edit link. Then click button 'Continue'.
		* STEP 4 - At input 'Search for (case sensitive string):' input this link 'http://localhost/MillionDollarScript_p22'.
				 - At input 'Replace with:' input YOUR_BASE_HTTP_PATH.
				 - Click button 'Submit Search String'.
		* STEP 5 - Final.
	
	3.3 
		* Login ADMIN to manage your BLOG by this link: 'BASE_HTTP_PATH/blog/wp-admin' with user/password is 'admin/abc123'.
		* Change Permalinks by 'Post-name' if it not.
		
 4 Check your site.	