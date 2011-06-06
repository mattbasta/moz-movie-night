--------------------------------------
Mozilla Movie Night Voting Application
--------------------------------------

Do you like movies? Do you like to vote on which movie you're going to see? Then you're going to love this app! Built in PHP, this is the official Mozilla Intern Movie Night voting application.

Requirements:

This app is designed to run in an Interchange environment:
http://github.com/mattbasta/interchange

Cloud should be loaded as a library:
http://cloud.serverboy.net/

Setup
=====

The first step is to get the database together. You can find a schme in ``setup/setup.sql``. Just run that to create the necessary tables.

The second step is to make the appropriate settings file. Modify ``endpoint/settings.template.php`` with the info that it requires (FB app info, SQL info). Save the file as ``endpoint/settings.php``.

