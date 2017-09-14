goog.provide('nextformdemo.components.MultipleFormComponent');

// dj
goog.require('dj.sys.components.AbstractComponent');

// nextform
goog.require('nextform.controllers.SessionController');

/**
 * @constructor
 * @extends {dj.sys.components.AbstractComponent}
 */
nextformdemo.components.MultipleFormComponent = function()
{
    nextformdemo.components.MultipleFormComponent.base(this, 'constructor');

    /**
     * @private
     * @type {nextform.controllers.SessionController}
     */
    this.session_ = new nextform.controllers.SessionController();
};

goog.inherits(
    nextformdemo.components.MultipleFormComponent,
    dj.sys.components.AbstractComponent
);

/** @inheritDoc @export */
nextformdemo.components.MultipleFormComponent.prototype.ready = function()
{
    return this.baseReady(nextformdemo.components.MultipleFormComponent, function(resolve, reject){
        goog.array.forEach(this.queryElements('form'), function(element){
            this.session_.addForm(element);
        }, this);
        resolve();
    });
};

/** @inheritDoc @export */
nextformdemo.components.MultipleFormComponent.prototype.init = function()
{
    return this.baseInit(nextformdemo.components.MultipleFormComponent, function(resolve, reject){
        this.handler.listen(this.session_, nextform.events.SessionEvent.EventType.COMPLETED,
            this.handleSessionComplete_);
        resolve();
    });
};

/**
 * @private
 * @param {nextform.events.SessionEvent} event
 */
nextformdemo.components.MultipleFormComponent.prototype.handleSessionComplete_ = function(event)
{
    console.log('complete', event);
};