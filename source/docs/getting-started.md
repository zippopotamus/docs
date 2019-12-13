---
title: Getting Started
description: How to use the free Zippopotam.us API service
extends: _layouts.documentation
section: content
---

# Getting Started

The core offering of [Zippopotam.us](https://zippopotam.us) is a free, open source <abbr title="application programming interface">API</abbr> that allows application developers to do various things with postal and US ZIP codes.

GeoNames data is ingested into a RediSearch instance which is then queried by the Zippopotam.us API service which is written in Go.

## Core Use Cases

Some of the core use cases for implementing the Zippopotam.us service in your website or application are:

1. Pre-filling city and state/province based on postal code

1. Finding <abbr title="point of interest">POI</abbr>s around a user when you only have their postal or zip code.

1. Looking up cities or places by name to get a centroid latitude and longitude pair to use in queries against data stores that allow for searching by location.

## Data Coverage and Accuracy

All data in the Zippopotam.us API service is from [GeoNames](https://geonames.org). Data served through the service is provided "as-is" without any guarantee on accuracy, coverage, etc.

GeoNames also notes the following postal code restrictions that are by extension applicable to this service:

>For Canada we have only the first letters of the full postal codes (for
    copyright reasons)<br>
     For Chile we have only the first digits of the full postal codes (for copyright reasons)<br>
     For Ireland we have only the first letters of the full postal codes (for copyright reasons)<br>
     For Malta we have only the first letters of the full postal codes (for copyright reasons)<br>
     The Argentina data file contains the first 5 positions of the postal code.<br>
     For Brazil only major postal codes are available (only the codes ending with -000 and the major code per municipality).

### Adding or Correcting Postal Data {#additions-or-corrections}

Since Zippopotam.us doesn't curate or maintain its own data, any and all data corrections or additional data should be contributed directly to [GeoNames](https://geonames.org).

## Cross-Origin Resource Sharing (CORS)

The API service has CORS enabled, which should allow consuming developers to use the service from Javascript run in the browser from any website.