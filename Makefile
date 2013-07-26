vendor: composer.phar
	@php composer.phar install

composer.phar:
	@echo "Installing composer..."
	@curl -s https://getcomposer.org/installer | php
	
update: composer.phar
	@php composer.phar update
	
autoload: composer.phar
	@php composer.phar dump-autoload

doc: vendor
	@mkdir -p "docs"

	@apigen \
	--source ./ \
	--destination docs/ --title Autodoc \
	--exclude "*/composer/*" \
	--exclude "*/tests/*" \
	--template-config /usr/share/php/data/ApiGen/templates/bootstrap/config.neon

cache-clear:
	@rm -fv ./repository/cache/*/*
	@rm -fv ./repository/vars/cached_*
	@rm -fv ./repository/thumbnailer/*

reset: cache-clear
	@rm -Rf ./vendor
	@rm -f ./composer.phar
	@rm -f ./composer.lock
	@rm -f ./protected/all/config/core.php
	@rm -f ./protected/all/config/user.php