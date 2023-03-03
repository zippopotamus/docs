build_production:
	npm run production

.PHONY: build
build: build_production

build_local:
	npm run dev

.PHONY: dev
dev: build_local

.PHONY: clean
clean:
	rm -rf build_*
	#rm -rf source/assets/main.css
