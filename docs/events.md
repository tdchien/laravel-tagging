Events
============

The `Taggable` trait will fire off two events.

```php
Chientd\Tagging\Events\TagAdded;

Chientd\Tagging\Events\TagRemoved;
```

You can add listeners and track these events.

```php
\Event::listen(Chientd\Tagging\Events\TagAdded::class, function($article){
	\Log::debug($article->title . ' was tagged');
});
```