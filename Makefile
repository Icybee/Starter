dummy:
	@echo "choose one of the following command: install, test, doc or clean."

install:
	@if [ ! -f "composer.phar" ] ; then \
		echo "Installing composer..." ; \
		curl -s https://getcomposer.org/installer | php ; \
	fi
	
	@php composer.phar install

update:
	@php composer.phar update
	
setup:
	sudo chown www-data:www-data repository -R

test:
	@if [ ! -d "vendor" ] ; then \
		make install ; \
	fi

	@phpunit

doc:
	@if [ ! -d "vendor" ] ; then \
		make install ; \
	fi

	@mkdir -p "docs"

	@apigen \
	--source ./ \
	--destination docs/ --title ICanBoogie/ActiveRecord \
	--exclude "*/tests/*" \
	--exclude "*/composer/*" \
	--template-config /usr/share/php/data/ApiGen/templates/bootstrap/config.neon
	
clean:
	@rm -fR docs
	@rm -fR vendor
	@rm -f composer.lock
	@rm -f composer.phar
