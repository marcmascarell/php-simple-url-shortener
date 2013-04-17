# shortnr - Simple PHP URL shortener

If you are looking for a simple shortener and don't need lot of features you can fork/clone/hack/whatever-you-want this.

## Features

- Generate slug using your link
- Button to generate random slug (alias)
- Count clicks (redirections)
- CSRF token

## Usage

1. Setup database
  - Create a table with this fields:
      - id int (11) auto_increment primary
      - alias varchar (255)
      - link varchar (255)
      - clicks int (11)
    
2. Fill `lib/config.php` with your own data
3. Ready

## Additional info and thanks

- Thanks for: Medoo database framework by Angel Lai
- Thanks for: jQuery Slug Generation Plugin by Perry Trinier
- Help, critics & suggestions are accepted

## License

- Copyright 2013, Marc Mascarell
- [GNU Public License](http://opensource.org/licenses/gpl-license.php)
