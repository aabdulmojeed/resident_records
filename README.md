# Community Records Management System

### Development Guidelines
We use `composer.json` to autoload classes so we can avoid having multiple `require*` or `include*` statements. When you add new classes to `config`, `class` or `api`, please remember to execute `composer dump-autoload` for the respective autoloaders to be regenerated.
