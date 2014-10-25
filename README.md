Namespacery
===========

Namespacery is a simple PHP library to help parse namespaces in an easily-accessible way.

## Installation

The library can be installed with Composer, by including the following in your `composer.json:

    ```json
    "require": {
        "xenolope/namespacery": "0.*"
    }
    ```

## Usage

    ```php
    $resolver = new \Xenolope\Namespacery('Vendor\Package\Group\Class');

    // Returns the value of the segment at the given index, or an \OutOfBoundsException if the index doesn't exist
    $resolver->parseSegments()->getSegment(1);

    // Returns an array of all segments in the namespace
    $resolver->parseSegments()->getSegments();
    ```

## License

Namespacery is released under the MIT License; please see [LICENSE](LICENSE) for more information.