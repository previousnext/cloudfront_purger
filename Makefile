#!/usr/bin/make -f

phpcs:
	@echo ${cc_green}">>> Linting PHP..."${cc_end}
	bin/phpcs --report=full --standard=vendor/drupal/coder/coder_sniffer/Drupal/ruleset.xml --extensions=php,module src tests

phpcbf:
	@echo ${cc_green}">>> Linting PHP..."${cc_end}
	bin/phpcbf --standard=vendor/drupal/coder/coder_sniffer/Drupal/ruleset.xml --extensions=php,module src tests
