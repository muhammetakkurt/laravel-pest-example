### Installation
```touch database/database.sqlite```

### Configuration
Open ```git-hooks/pre-progress``` file.
Run ```which php``` command in your terminal, then replace this line ```#!/opt/homebrew/bin/php``` with yours. 

I will change the pre-commit and pre-push files as below. I've used <strong>PEST</strong> Test framework which runs with PHP Frameworks. It uses pest commands as like ```./vendor/bin/pest``` for running my test cases. You can paste your execute command. 

```php
#!/opt/homebrew/bin/php
<?php

echo "Running tests.. " . PHP_EOL;
exec('./vendor/bin/pest', $testResults, $returnCode);
if ($returnCode !== 0) {
    foreach($testResults as $testResult) echo $testResult . PHP_EOL;
    echo "Opps! Something went wrong. Can not push changes until tests are OK." . PHP_EOL;
    exit(1);
}

// Show summary (last 3 line)
foreach (array_slice($testResults, -3, 3) as $testResult) echo $testResult . PHP_EOL;
exit(0);
```

### Clone pre-progress template 
```
cp git-hooks/pre-progress .git/hooks/pre-commit
cp git-hooks/pre-progress .git/hooks/pre-push
```

### Set permissions
```
chmod +x .git/hooks/pre-commit
```

```
chmod +x .git/hooks/pre-push
```

### Commit
"Run Git hooks" checkbox will have been appeared in the "Before commit" area.

<img width="851" alt="Screen Shot 2023-01-07 at 08 41 19" src="https://user-images.githubusercontent.com/4670039/211133153-ad3b7c5b-f631-4a7b-a43b-cb5727cfb1e9.png">


## Result
### Error Case;
<img width="615" alt="Screen Shot 2023-01-07 at 08 57 10" src="https://user-images.githubusercontent.com/4670039/211133613-aa73a13a-0f67-4b06-9f8c-b390f5a39bb8.png">

### Success Case;
<img width="922" alt="Screen Shot 2023-01-07 at 08 45 20" src="https://user-images.githubusercontent.com/4670039/211133362-12d749d3-3528-4d51-bfbe-fc56018323ca.png">
