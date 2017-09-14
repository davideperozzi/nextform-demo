goog.provide('nextformdemo');
goog.provide('nextformdemo.bootstrap');

// nextformdemo
goog.require('nextformdemo.Application');

/**
 * @export
 */
nextformdemo.bootstrap = function() {
    (new nextformdemo.Application()).start();
};