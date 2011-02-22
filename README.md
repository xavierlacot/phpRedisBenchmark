# PHP Redis libraries benchmark

## Introduction

This repository contains a benchmark suite for PHP Redis libraries. The test suite currently supports [predis](https://github.com/nrk/predis), [redisent](https://github.com/jdp/redisent) and [Rediska](http://rediska.geometria-lab.net/).

__Disclaimer__ : this is an alpha work, a two hours test. This suite is not intended to prove that a library is better or worse than an other one. It has just been made to show what to expect from common PHP Redis libraries (but of course, you should always look at the future plans of the developer, the extensibility, maintainability, ease of use, tools provided, etc.).

## Raw results

    Library    100,000 get    100,000 set        memory
    predis      20.0992 s.     18.9528 s.    3118280 b.
    redisent    17.6657 s.     17.6419 s.     855528 b.
    Rediska     42.7914 s.     54.9432 s.    2295960 b.

## Running the tests

Simply run the command:

    php index.php

This will launch several php processes, each running a certain amount of iterations for each of the tested libraries. A log file will be generated, containing the test suite results.