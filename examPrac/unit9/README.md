Below is a detailed and simplified explanation of **Unit 9: File Handling (3 Hrs.)** in PHP, tailored for your BIT 5th semester board exam preparation for the subject WT-2 (Web Technology 2). The content is structured as a README.md file, formatted in Markdown, with clear definitions, beginner-friendly explanations, practical code examples, and theoretical concepts for File Read, Write, Close, File Upload, Parsing CSV File, and Parsing JSON File. This note is designed to be comprehensive, exam-focused, and savable for further study, ensuring you master PHP file handling for your exam. The examples are straightforward and include error handling to align with best practices.

# PHP File Handling: Unit 9 Notes for BIT 5th Semester (WT-2)

This document provides detailed notes on **Unit 9: File Handling (3 Hrs.)** for the Web Technology 2 (WT-2) syllabus. It covers File Read, Write, Close, File Upload, Parsing CSV File, and Parsing JSON File, with clear definitions, theoretical concepts, easy explanations, and practical examples. The content is designed to help you prepare for your board exam and understand file handling in PHP thoroughly.

## 1. File Read

### Definition

**File reading** in PHP involves accessing and retrieving the contents of a file from the server’s filesystem. PHP provides functions like `file_get_contents()`, `fopen()`, `fread()`, and `file()` to read files.

### Theory

- **Use Cases**: Reading configuration files, log files, or user-uploaded text files.
- **Modes**: Open files in read mode (`r`) using `fopen()`.
- **Error Handling**: Check if the file exists and is readable to avoid errors.
- **Functions**:
  - `file_get_contents($filename)`: Reads entire file into a string.
  - `file($filename)`: Reads file into an array, each line as an element.
  - `fopen($filename, $mode)` with `fread()`: Reads file in chunks.

### Example: Reading a File

```php
<?php
// File: read_file.php
$filename = "sample.txt";

// Method 1: Read entire file as a string
if (file_exists($filename)) {
    $content = file_get_contents($filename);
    echo "File Content (file_get_contents):\n$content\n";
} else {
    echo "Error: File does not exist.";
}

// Method 2: Read file line by line into array
if (file_exists($filename)) {
    $lines = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    echo "File Content (file):\n";
    foreach ($lines as $line) {
        echo "$line\n";
    }
} else {
    echo "Error: File does not exist.";
}

// Method 3: Read using fopen and fread
if (file_exists($filename)) {
    $handle = fopen($filename, "r");
    if ($handle) {
        $content = fread($handle, filesize($filename));
        echo "File Content (fread):\n$content\n";
        fclose($handle);
    } else {
        echo "Error: Unable to open file.";
    }
} else {
    echo "Error: File does not exist.";
}
?>
```

### Explanation

- **Sample File**: Create `sample.txt` with content:
  ```
  Hello, this is line 1.
  This is line 2.
  Welcome to PHP!
  ```
- **file_get_contents**: Reads the entire file into a string, simple for small files.
- **file**: Reads the file into an array, useful for line-by-line processing. Flags `FILE_IGNORE_NEW_LINES` and `FILE_SKIP_EMPTY_LINES` clean up the output.
- **fopen/fread**: Opens the file in read mode (`r`), reads content, and closes the file with `fclose()`.
- **Error Handling**: Checks `file_exists()` to prevent errors if the file is missing.

## 2. File Write

### Definition

**File writing** in PHP involves creating or modifying a file’s content on the server. Functions like `file_put_contents()`, `fopen()`, and `fwrite()` are used.

### Theory

- **Use Cases**: Saving user input, generating logs, or creating configuration files.
- **Modes**:
  - `w`: Write (overwrite existing file).
  - `a`: Append (add to the end of the file).
- **Error Handling**: Ensure the file is writable and the directory has proper permissions.
- **Functions**:
  - `file_put_contents($filename, $data)`: Writes a string to a file.
  - `fopen($filename, $mode)` with `fwrite()`: Writes data in chunks.

### Example: Writing to a File

```php
<?php
// File: write_file.php
$filename = "output.txt";
$data = "Hello, PHP!\nThis is a new line.";

// Method 1: Write using file_put_contents
if (is_writable($filename) || !file_exists($filename)) {
    if (file_put_contents($filename, $data)) {
        echo "Data written successfully using file_put_contents.\n";
    } else {
        echo "Error: Unable to write to file.\n";
    }
} else {
    echo "Error: File is not writable.\n";
}

// Method 2: Append using fopen and fwrite
$appendData = "\nAppended line.";
$handle = fopen($filename, "a");
if ($handle) {
    if (fwrite($handle, $appendData)) {
        echo "Data appended successfully using fwrite.\n";
    } else {
        echo "Error: Unable to append to file.\n";
    }
    fclose($handle);
} else {
    echo "Error: Unable to open file for appending.\n";
}
?>
```

### Explanation

- **file_put_contents**: Writes `$data` to `output.txt`, overwriting if it exists (`w` mode implied).
- **fopen/fwrite**: Opens the file in append mode (`a`), adds `$appendData`, and closes with `fclose()`.
- **Error Handling**: Checks `is_writable()` to ensure the file or directory allows writing.
- **Output File (output.txt)**:
  ```
  Hello, PHP!
  This is a new line.
  Appended line.
  ```

## 3. File Close

### Definition

**File closing** in PHP involves releasing a file resource after reading or writing, using `fclose()`. This is necessary when using `fopen()` to free system resources.

### Theory

- **Why Close?**: Prevents memory leaks and ensures file integrity.
- **When Used**: Only with `fopen()`; not needed for `file_get_contents()` or `file_put_contents()`.
- **Best Practice**: Always close files after operations, even if errors occur.

### Example: File Close with Error Handling

```php
<?php
// File: file_close.php
$filename = "sample.txt";

$handle = @fopen($filename, "r");
if ($handle) {
    $content = fread($handle, filesize($filename));
    echo "File Content:\n$content\n";
    fclose($handle);
    echo "File closed successfully.\n";
} else {
    echo "Error: Unable to open file.\n";
}
?>
```

### Explanation

- Opens `sample.txt` in read mode (`r`).
- Reads content with `fread()` and closes the file with `fclose()`.
- Uses `@` to suppress potential errors (not recommended in production; shown for completeness).
- Ensures the file is closed if opened successfully.

## 4. File Upload

### Definition

**File upload** in PHP allows users to send files (e.g., images, PDFs) from a form to the server, handled via the `$_FILES` superglobal. The form must use `enctype="multipart/form-data"`.

### Theory

- **Form Requirements**: Use `<input type="file">` and `method="POST"`.
- **$\_FILES**: Contains file details (name, type, size, tmp_name, error).
- **Security**:
  - Validate file type, size, and extension.
  - Move uploaded file from temporary location using `move_uploaded_file()`.
- **Use Cases**: Uploading user avatars, documents, or media.

### Example: File Upload with Validation

```html
<!-- File: upload_form.php -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>File Upload</title>
  </head>
  <body>
    <h2>Upload a File</h2>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
      <label for="file">Choose File:</label>
      <input type="file" id="file" name="userfile" required /><br /><br />
      <input type="submit" value="Upload" />
    </form>
  </body>
</html>
```

```php
<?php
// File: upload.php
$uploadDir = "uploads/";
$allowedTypes = ["image/jpeg", "image/png"];
$maxSize = 2 * 1024 * 1024; // 2MB

// Create uploads directory if it doesn't exist
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0755, true);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["userfile"])) {
    $file = $_FILES["userfile"];

    // Check for errors
    if ($file["error"] !== UPLOAD_ERR_OK) {
        echo "Error: Upload failed with error code {$file['error']}.";
        exit;
    }

    // Validate file type and size
    if (!in_array($file["type"], $allowedTypes)) {
        echo "Error: Only JPEG and PNG files are allowed.";
        exit;
    }
    if ($file["size"] > $maxSize) {
        echo "Error: File size exceeds 2MB limit.";
        exit;
    }

    // Generate a safe filename
    $filename = uniqid() . "-" . basename($file["name"]);
    $destination = $uploadDir . $filename;

    // Move the uploaded file
    if (move_uploaded_file($file["tmp_name"], $destination)) {
        echo "File uploaded successfully: <a href='$destination'>$filename</a>";
    } else {
        echo "Error: Failed to move uploaded file.";
    }
} else {
    echo "Error: No file uploaded.";
}
?>
```

### Explanation

- **Form**: Uses `enctype="multipart/form-data"` and `<input type="file">` to allow file uploads.
- **Validation**:
  - Checks `$_FILES["userfile"]["error"]` for upload issues.
  - Ensures file type is JPEG or PNG and size is under 2MB.
- **Move File**: Uses `move_uploaded_file()` to move the file from the temporary location (`tmp_name`) to the `uploads/` directory.
- **Security**: Generates a unique filename with `uniqid()` to prevent overwrites and sanitizes the filename with `basename()`.
- **Directory**: Creates `uploads/` with permissions `0755` if it doesn’t exist.
- **Output**: Links to the uploaded file if successful.

## 5. Parsing CSV File

### Definition

**Parsing a CSV file** involves reading and processing a Comma-Separated Values (CSV) file, where data is stored in rows with fields separated by commas. PHP uses `fopen()` with `fgetcsv()` or `str_getcsv()` for parsing.

### Theory

- **Use Cases**: Importing data (e.g., user lists, product catalogs) from spreadsheets.
- **Structure**: Each line is a row; fields are separated by commas (or other delimiters).
- **Functions**:
  - `fgetcsv($handle, $length, $delimiter)`: Reads a line from a CSV file into an array.
  - `str_getcsv($string, $delimiter)`: Parses a CSV string into an array.

### Example: Parsing a CSV File

```php
<?php
// File: parse_csv.php
$filename = "users.csv";

// Sample CSV content (create users.csv with this):
/*
name,email,age
Alice,alice@example.com,20
Bob,bob@example.com,25
*/

// Read and parse CSV
if (file_exists($filename)) {
    $handle = fopen($filename, "r");
    if ($handle) {
        // Skip header row
        $header = fgetcsv($handle);
        echo "Header: " . implode(", ", $header) . "\n";

        // Read data rows
        echo "Data:\n";
        while ($row = fgetcsv($handle)) {
            echo "Name: {$row[0]}, Email: {$row[1]}, Age: {$row[2]}\n";
        }
        fclose($handle);
    } else {
        echo "Error: Unable to open CSV file.";
    }
} else {
    echo "Error: CSV file does not exist.";
}
?>
```

### Explanation

- **CSV File**: `users.csv` contains a header row (`name,email,age`) and data rows.
- **fgetcsv**: Reads each line into an array, with fields split by commas.
- **Processing**: Skips the header row, then loops through data rows to display.
- **Error Handling**: Checks file existence and successful opening.
- **Output**:
  ```
  Header: name, email, age
  Data:
  Name: Alice, Email: alice@example.com, Age: 20
  Name: Bob, Email: bob@example.com, Age: 25
  ```

## 6. Parsing JSON File

### Definition

**Parsing a JSON file** involves reading and decoding a JavaScript Object Notation (JSON) file into a PHP array or object. PHP uses `json_decode()` to parse JSON data.

### Theory

- **Use Cases**: Reading configuration files, API responses, or data exports.
- **Structure**: JSON consists of key-value pairs, arrays, and nested objects.
- **Functions**:
  - `json_decode($json, $assoc)`: Converts JSON string to PHP array (`$assoc=true`) or object (`$assoc=false`).
  - `json_last_error()`: Checks for JSON parsing errors.

### Example: Parsing a JSON File

```php
<?php
// File: parse_json.php
$filename = "config.json";

// Sample JSON content (create config.json with this):
/*
{
    "site": {
        "name": "My Website",
        "url": "https://example.com"
    },
    "users": [
        {"name": "Alice", "email": "alice@example.com"},
        {"name": "Bob", "email": "bob@example.com"}
    ]
}
*/

// Read and parse JSON
if (file_exists($filename)) {
    $jsonContent = file_get_contents($filename);
    $data = json_decode($jsonContent, true); // true for array, false for object

    if (json_last_error() === JSON_ERROR_NONE) {
        // Access data
        echo "Site Name: {$data['site']['name']}\n";
        echo "Site URL: {$data['site']['url']}\n";
        echo "Users:\n";
        foreach ($data['users'] as $user) {
            echo "Name: {$user['name']}, Email: {$user['email']}\n";
        }
    } else {
        echo "Error: Invalid JSON format - " . json_last_error_msg();
    }
} else {
    echo "Error: JSON file does not exist.";
}
?>
```

### Explanation

- **JSON File**: `config.json` contains nested data (site details and user list).
- **file_get_contents**: Reads the JSON file into a string.
- **json_decode**: Converts the JSON string to a PHP array (`true` for associative array).
- **Error Handling**: Checks `json_last_error()` to ensure valid JSON.
- **Output**:
  ```
  Site Name: My Website
  Site URL: https://example.com
  Users:
  Name: Alice, Email: alice@example.com
  Name: Bob, Email: bob@example.com
  ```

## Key Concepts and Theory

- **File Handling Overview**:
  - File handling in PHP allows interaction with server files for reading, writing, and processing data.
  - Essential for tasks like logging, data import/export, and file uploads.
- **Security Considerations**:
  - **File Read/Write**: Validate file paths and permissions to prevent unauthorized access.
  - **File Upload**: Restrict file types, sizes, and use `move_uploaded_file()` to handle temporary files securely.
  - **CSV/JSON**: Sanitize parsed data to prevent injection attacks when storing or displaying.
- **Performance**:
  - Use `file_get_contents()` for small files; `fopen()` for large files to read/write in chunks.
  - Close files with `fclose()` to free resources.
- **Error Handling**:
  - Always check file existence (`file_exists()`), writability (`is_writable()`), and errors (`$_FILES["error"]`, `json_last_error()`).
  - Provide user-friendly error messages.

## Key Points for Board Exam

- **File Read**: Use `file_get_contents()`, `file()`, or `fopen()/fread()` to read files; check `file_exists()`.
- **File Write**: Use `file_put_contents()` or `fopen()/fwrite()`; support overwrite (`w`) and append (`a`) modes.
- **File Close**: Always use `fclose()` after `fopen()` to free resources.
- **File Upload**: Use `$_FILES`, `enctype="multipart/form-data"`, and `move_uploaded_file()`; validate type and size.
- **Parsing CSV**: Use `fgetcsv()` to read CSV rows into arrays; handle headers and delimiters.
- **Parsing JSON**: Use `json_decode()` to convert JSON to arrays/objects; check `json_last_error()`.

## Tips for Study

- **Practice**:
  - Create `sample.txt`, `users.csv`, and `config.json` as shown, then test each script in XAMPP.
  - Set up an `uploads/` directory with `chmod 755` for the file upload example.
  - Upload a JPEG/PNG file to test the upload script and verify it appears in `uploads/`.
- **Debugging**:
  - Use `var_dump()` to inspect `$_FILES`, CSV rows, or JSON data.
  - Check PHP error logs if files fail to open or parse.
- **Security**:
  - Ensure uploaded files are stored outside the web root in production.
  - Validate JSON and CSV data before processing.
- **Visualization**:
  - **File Read/Write**: Diagram of PHP reading/writing to a file on the server.
  - **File Upload**: Flowchart of form → `$_FILES` → validation → `move_uploaded_file()`.
  - **CSV/JSON Parsing**: Diagram of file → PHP array → output.
  - On Canva, create a study infographic:
    - **Slide 1**: Overview of Unit 9 with icons for files, uploads, CSV, and JSON.
    - **Slide 2**: File read/write process with code snippets (`file_get_contents`, `file_put_contents`).
    - **Slide 3**: File upload flowchart with form and PHP code.
    - **Slide 4**: CSV/JSON parsing with sample file content and output.
    - Use Canva’s code block templates or text boxes for key code (e.g., `fgetcsv()`, `json_decode()`).

## Additional Notes

- **Permissions**: Ensure the PHP process (e.g., Apache) has read/write permissions for files and directories (use `chmod 644` for files, `755` for directories).
- **Large Files**: For large files, use `fopen()` with `fread()`/`fwrite()` to process in chunks, avoiding memory issues.
- **CSV Variations**: Handle different delimiters (e.g., `;`) by passing to `fgetcsv($handle, 0, ";")`.
- **JSON Validation**: Use `json_last_error()` to debug malformed JSON in exams.

---

**Save this README.md** to your study folder for quick reference. View it in Visual Studio Code, GitHub, or a Markdown viewer. Test the code in a PHP environment like XAMPP, ensuring you create the sample files (`sample.txt`, `users.csv`, `config.json`) and set up the `uploads/` directory. For Canva, use the content to create visual aids like flowcharts or code screenshots to reinforce learning. Practice these examples hands-on to master Unit 9 for your board exam. Good luck with your preparation, and let me know if you need further clarification!
