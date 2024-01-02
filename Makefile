#my make file

start-project:
	composer install
	composer validate

lint:
	composer exec --verbose phpcs -- --standard=PSR12 src bin

start-game:
	./bin/brain-games

brain-calc:
	./bin/brain-calc

brain-even:
	./bin/brain-even

brain-gcd:
	./bin/brain-gcd

brain-progression:
	./bin/brain-progression

load:
	composer dump-autoload