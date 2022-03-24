# laravelbug

This repository demonstrates a bug with lazy collections.

1. clone this repository
2. `composer install`
3. `cp .env.example .env`
4. configure DB\_... in .env
5. `./artisan migrate`
6. `./artisan db:seed`
7. `./artisan bug:trigger`

`db:seed` inserts a bunch of rows in the `entries` table (48555, to be precise).
The command `bug:trigger`, defined in `app/Console/Commands/BugTrigger.php`, selects all rows in `entries`
using `Entry::orderBy('date')->lazy()` and expects all ids from 1 to 48555 to get returned exactly once.
On my machine, the command returns:

    entry #1 occured 0 times, expected 1
    entry #9001 occured 2 times, expected 1
    entry #9712 occured 0 times, expected 1
    entry #19001 occured 2 times, expected 1
    entry #19423 occured 0 times, expected 1
    entry #29001 occured 2 times, expected 1
    entry #29134 occured 0 times, expected 1
    entry #38001 occured 2 times, expected 1
    entry #38845 occured 0 times, expected 1
    entry #48555 occured 2 times, expected 1
