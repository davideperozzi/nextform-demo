goog.provide('nextformdemo.Application');

// dorfjungs
goog.require('dj.sys.managers.ComponentManager');

// nextformdemo
goog.require('nextformdemo.components.RegisterFormComponent');
goog.require('nextformdemo.components.MultipleFormComponent');

/**
 * @constructor
 */
nextformdemo.Application = function()
{
    /**
     * @private
     * @type {dj.sys.managers.ComponentManager}
     */
    this.manager_ = new dj.sys.managers.ComponentManager();
};

/**
 * @public
 */
nextformdemo.Application.prototype.start = function()
{
    this.manager_.add('register-form', nextformdemo.components.RegisterFormComponent);
    this.manager_.add('multiple-form', nextformdemo.components.MultipleFormComponent);
    this.manager_.init();
};