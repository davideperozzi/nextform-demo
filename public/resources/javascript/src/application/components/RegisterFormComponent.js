goog.provide('nextformdemo.components.RegisterFormComponent');

// dj
goog.require('dj.sys.components.AbstractComponent');

// nextform
goog.require('nextform.events.FormEvent');
goog.require('nextform.controllers.FormController');

/**
 * @constructor
 * @extends {dj.sys.components.AbstractComponent}
 */
nextformdemo.components.RegisterFormComponent = function()
{
    nextformdemo.components.RegisterFormComponent.base(this, 'constructor');

    /**
     * @private
     * @type {nextform.controllers.FormController}
     */
    this.form_ = new nextform.controllers.FormController();
};

goog.inherits(
    nextformdemo.components.RegisterFormComponent,
    dj.sys.components.AbstractComponent
);

/** @inheritDoc @export */
nextformdemo.components.RegisterFormComponent.prototype.ready = function()
{
    return this.baseReady(nextformdemo.components.RegisterFormComponent, function(resolve, reject){
        this.form_.init(/** @type {HTMLFormElement} */ (this.queryElement('form')));
        resolve();
    });
};

/** @inheritDoc @export */
nextformdemo.components.RegisterFormComponent.prototype.init = function()
{
    return this.baseInit(nextformdemo.components.RegisterFormComponent, function(resolve, reject){
        resolve();
    });
};