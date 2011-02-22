# PHP Redis libraries benchmark

## Introduction

This repository contains a benchmark suite for PHP Redis libraries. The test suite currently supports predis and Rediska.

## Results

    Library    100,000 get    100,000 set        memory
    predis      20.0992 s.     18.9528 s.    3118280 b.
    Rediska     42.7914 s.     54.9432 s.    2295960 b.

## Running the tests

Simply run the command:

    php index.php

This will launch several php processes, each running a certain amount of iterations for each of the tested libraries.