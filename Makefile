#my make file

install:
	composer install

validate:
	composer validate

lint:
	composer exec --verbose phpcs -- --standard=PSR12 src bin

brain-games:
	./bin/brain-games

brain-calc:
	./bin/brain-calc

brain-even:
	./bin/brain-even

brain-gcd:
	./bin/brain-gcd

brain-progression:
	./bin/brain-progression

brain-prime:
	./bin/brain-prime

load:
	composer dump-autoload

lint-fix:
    composer exec --verbose phpcbf -- --standard=PSR12 --colors src bin