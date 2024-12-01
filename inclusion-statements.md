> Use `require` for config/db_connection i.e. important files.

In PHP, there are four primary inclusion statements used to include external files into a script: `include`, `include_once`, `require`, and `require_once`. These statements allow you to reuse code, functions, or classes across different parts of your application. Here's a demonstration of each one.

### 1. `include`:

The `include` statement includes and evaluates the specified file. If the file is not found, PHP will emit a warning, but the script will continue executing.

```php
<?php
// demo_include.php
echo "This is the included file using include.\n";
?>
```

```php
<?php
// main.php
include 'demo_include.php'; // This will include the file and output its content
echo "This is the main file.\n";
?>
```

**Output:**

```
This is the included file using include.
This is the main file.
```

### 2. `include_once`:

The `include_once` statement includes the specified file **only once**. If the file has already been included previously, it will not be included again.

```php
<?php
// demo_include_once.php
echo "This file is included once.\n";
?>
```

```php
<?php
// main_once.php
include_once 'demo_include_once.php'; // This will include the file for the first time
include_once 'demo_include_once.php'; // This will not include the file again
echo "This is the main file with include_once.\n";
?>
```

**Output:**

```
This file is included once.
This is the main file with include_once.
```

### 3. `require`:

The `require` statement is similar to `include`, but if the file cannot be found or included, it will result in a **fatal error**, and the script will stop executing.

```php
<?php
// demo_require.php
echo "This is the required file.\n";
?>
```

```php
<?php
// main_require.php
require 'demo_require.php'; // This will include and evaluate the file
echo "This is the main file with require.\n";
?>
```

**Output:**

```
This is the required file.
This is the main file with require.
```

If `demo_require.php` does not exist or is not found, the script would stop executing, and you would see a fatal error.

### 4. `require_once`:

The `require_once` statement includes the specified file only once, similar to `include_once`. However, like `require`, if the file cannot be found, it will result in a **fatal error**.

```php
<?php
// demo_require_once.php
echo "This file is required once.\n";
?>
```

```php
<?php
// main_require_once.php
require_once 'demo_require_once.php'; // This will include the file for the first time
require_once 'demo_require_once.php'; // This will not include the file again
echo "This is the main file with require_once.\n";
?>
```

**Output:**

```
This file is required once.
This is the main file with require_once.
```

### Key Differences:

- **`include`**: Includes the file, but if the file is not found, it will issue a warning and continue execution.
- **`include_once`**: Includes the file only once. If the file has already been included, it won't be included again.
- **`require`**: Includes the file, but if the file is not found, it will stop execution with a fatal error.
- **`require_once`**: Includes the file only once and stops execution if the file is not found.

In summary:

- Use `include` or `require` when you want to include files without worrying about multiple inclusions, and use `include_once` or `require_once` when you want to prevent including the same file multiple times.
