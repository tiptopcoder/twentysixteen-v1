# Custom Twenty Sixteen Theme - Ver. 1
This is a custom theme which is modified from original Twenty Sixteen Theme.
Just some minor changes in CSS and a few functions.

I tried using OOP in `functions.php` file and found that now it's easier to manage code. Damn cool!

## Instruction
1. Download

Use one of 2 methods to download:
  1. Git:
  
    `git clone https://github.com/TipTopCoder/twentysixteen-v1.git`
  2. Using Github link to zip file:
  
    `https://github.com/TipTopCoder/twentysixteen-v1/archive/master.zip`
2. Installation
  1. If you download a compressed file, please extract to anywhere you want.
  2. Then copy the folder which contains `style.css` to **Wordpress theme folder**, you can change folder name if you want.
  3. Go to Wordpress admin panel \> Appearance \> Activate **Twenty Sixteen Child Theme - V.1**
  4. Enjoy it!
  
## Features

#### Plugins
No plugin needed.

#### AJAX Login
Just put these HTML into a widget text in sidebar, you can also modify anything if you want.
```
<p class="err_msg" id="header_err"></p>
<p id="usr-title">Username</p>
<input type="text" name="username" id="username">
<p id="pwd-title">Password</p>
<input type="password" name="password" id="password">
<button type="button" id="login">Login</button>
```

#### Excerpt
In this theme, I replaced `the_content()` with `the_excerpt()` in loop content.

#### Social Sharing
Now you don't need to use any plugin, just put these HTML inside loop if you want it appears in content - or replace `<?php the_permalink() ?>` with other URL that you want to share.
> Facebook
```
<a href="https://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" target="_blank"><i class="genericon genericon-facebook"></i></a>
```
> Google+
```
<a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" target="_blank"><i class="genericon genericon-googleplus"></i></a>
```

#### Genericons
Any thing about using **Genericons**, please visit: [Genericons Official](https://genericons.com/).

## License
Of course, it's free!!!!