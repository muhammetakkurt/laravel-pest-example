Open ```git-hooks/pre-progress``` file.
Run ```which php``` command in your terminal, then replace this line ```#!/opt/homebrew/bin/php``` with yours. 

I've been used PEST Test framework which is running with PHP Frameworks. It uses pest commands as like ```./vendor/bin/pest``` for running my test cases. You can paste your execute command. 

```
#!/opt/homebrew/bin/php
<?php

echo "Running tests.. " . PHP_EOL;
exec('./vendor/bin/pest', $outputs, $returnCode);
if ($returnCode !== 0) {
  foreach($outputs as $output){
    echo $output . PHP_EOL;
  }
  echo "Opps! Something went wrong. Can not push changes untill tests are OK." . PHP_EOL;
  exit(1);
}

// Show summary (last line)
echo array_pop($outputs) . PHP_EOL;
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

## Result
### Error Case;
<img width="818" alt="Screen Shot 2023-01-07 at 08 25 25" src="https://user-images.githubusercontent.com/4670039/211132689-36cf62a7-13be-47db-a62f-1f3e12ecdae5.png">

### Success Case;
