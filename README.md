is421-elastic-search
====================

Cron
====

To import data into elastic search at regular intervals, set up a cron job that runs `cron.php` at a set interval. In you cron script, you need to set a couple of environment variables.

- `TWITTER_CONSUMER_KEY`: Your twitter API consumer key
- `TWITTER_CONSUMER_SECRET`: Your twitter API consumer secret
- `ELASTICSEARCH_URL`: The URL to elastic search. This should include the index and type.
