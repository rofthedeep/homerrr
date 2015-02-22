Env = {};

/**
 * Default options
 *
 * @type object
 */
Env.Config = {
    resourcePath: '/resources',
    applicationUrl: '/'
};

(function(jQuery) {
    Env.Application = function (config) {
        this.modules = [];
        this.plugins = [];
        this.ctx = false;
        this.config = jQuery.extend(true, Env.Config, config);
        this.sandbox = new Env.Sandbox(this);

        return jQuery.extend(this, {

            /**
             * registers all modules
             */
            registerModules: function(context) {
                var that = this;
                var moduleIds = [];

                if (this.ctx === false) {
                    this.ctx = context;
                }


                jQuery('.mod', context).each(function() {
                    var classes = jQuery(this).attr('class').split(' ');

                    if (classes.length > 1) {
                        var moduleName = '';

                        for (var i in classes) {
                            if (classes[i].length > 3 && classes[i].indexOf('mod') === 0) {
                                moduleName = classes[1].substr(3);
                            }
                        }

                        // CSS only modules have no object so instanciate only JS modules
                        if (moduleName.length > 0 && Env.Application[moduleName]) {
                            var moduleId = that.registerModule(this, moduleName);
                            moduleIds.push(moduleId);
                        }
                    }
                });

                return moduleIds;
            },

            /**
             * starts a module
             *
             *@param moduleId
             */
            start: function(moduleId) {
                this.modules[moduleId].start();
            },

            /**
             * stops a moduld
             *
             *@param moduleId
             */
            stop: function(moduleId) {
                this.modules[moduleId].stop();
                this.modules[moduleId] = null;
            },

            /**
             * Starts the application, registers all modules in body and starts them
             *
             * @returns void
             */
            run: function() {
                var modules = this.registerModules(jQuery('body'));

                for(var id in modules) {
                    this.start(modules[id]);
                }
            },

            /**
             * register a module autoload module if module class is not available
             *
             *@param domNode of the module container
             *@param name of the module
             */
            registerModule: function(domNode, moduleName) {
                var moduleId = parseInt(this.modules.length) + 1;

                this.modules[moduleId] = new Env.Application[moduleName](domNode, this.sandbox, moduleId);
                this.applyErrorHandler(moduleName, this.modules[moduleId]);

                this.modules[moduleId].init();

                return moduleId;
            },

            getPlugin: function(plugin, args) {
                if (this.plugins[plugin]) {

                } else {
                    var domNode = null;

                    this.plugins[plugin] = new Env.Application[plugin](domNode, this.sandbox);
                    this.applyErrorHandler(plugin, this.plugins[plugin]);

                    try {
                        this.plugins[plugin].init();
                    } catch (e) {
                        if (window.console && window.console.log) {
                            console.log(e);
                        }
                    }
                }

                return this.plugins[plugin];
            },

            /**
             * stop all modules
             */
            stopAll: function() {
                for(var id in this.modules) {
                    this.stop(id);
                }
            },

            /**
             * wrap all module methods with a anonymous function that catches erros
             * and channels the error messages
             */
            applyErrorHandler: function(moduleName, module) {
                var that = this;

                for(var property in module) {
                    var method = module[property];

                    if(jQuery.isFunction(method)) {
                        module[property] = function(moduleName, property, method) {
                            return function() {
                                try {
                                    return method.apply(this, arguments);
                                }
                                catch(ex) {
                                    if (window.console && window.console.log) {
                                        console.log('Error in ' + moduleName + '.' + property + '()');
                                        console.log(ex.message);
                                        console.log(ex.fileName + ' in line ' + ex.lineNumber);
                                    }

                                    if(that.config.supressErrors == false){
                                        throw ex;
                                    }
                                }
                            };
                        }(moduleName, property, method);
                    }
                }
            }

            /**
             * initialize the page, load theme and plugins
             */
            //initApplication: function() {

            //}

        });
    };
})(jQuery);

/**
 * The sandbox, observer and registry
 *
 *@param the application
 */
(function(jQuery) {
    Env.Sandbox = function(application) {
        /**
         * the application
         */
        this.application = application;

        /**
         * list of objects that are listening
         */
        this.listeners = [];

        /**
         * list of methods to call on the listening objects
         */
        this.listenerMethods = [];

        return jQuery.extend(this, {
            /**
             * returns parameter from config
             *
             *@param name of parameter
             */
            get: function(name) {
                return this.application.config[name];
            },

            /**
             * notify modules. calls the listening method in the context of the listening
             * object. so this insinde a listening method points to the listening module.
             *
             *@param name of the listener
             *@param variable amount of parameters to pass thru to the listening method
             */
            notify: function(name) {
                var args = [];

                for (i = 1; i < arguments.length; i++) {
                    args.push(arguments[i]);
                }

                try {
                    var method = this.listeners[name][this.listenerMethods[name]];
                    method.apply(this.listeners[name], args);
                } catch (e) {
                    if (window.console && window.console.log) {
                        console.log('no listener found for ' + name);
                        console.log(e);
                    }
                }
            },

            /**
             * stores a listening module
             *
             *@param name name of the listener
             *@param object that is listening
             *@param method that is called when the object is notified
             */
            listen: function(name, object, method) {
                this.listeners[name] = object;
                this.listenerMethods[name] = method;
            },

            /**
            * returns a plugin from the application
            *
            *@param name of the plugin
            *@param additional optional parameters
            *
            *@returns plugin
            */
            getPlugin: function(plugin) {
                var args = [];
                for (i = 1; i < arguments.length; i++) {
                    args.push(arguments[i]);
                }

                return this.application.getPlugin(plugin, args);
            },

            /**
             * returns a module by its module id (module ID ist stored as data-moduleId on the modules DOM-Node
             *
             * @param id of the module
             *
             * @returns module
             */
            getModule: function(moduleId) {
                if (this.application.modules[moduleId]) {
                    return this.application.modules[moduleId];
                } else {
                    throw {
                        name:        "Error",
                        message:     "no module registered for id: " + moduleId,
                        toString:    function(){return this.name + ": " + this.message;}
                    };
                }
            }
        });
    };
})(jQuery);

/**
 * abstract class for all modules
 *
 *@param domNode of the module container
 *@param sandbox
 */
(function(jQuery) {
    Env.Module = function(domNode, sandbox, moduleId) {
        if (arguments.length > 0) {

            /**
             * module container
             */
            this.ctx = domNode;

            /**
             * the sandbox
             */
            this.sandbox = sandbox;

            /**
             * id of this module
             */
            this.moduleId = moduleId;

            return jQuery.extend(this, {
                /**
                 * the init event chain, calls dependencies() and onInit() of the
                 * module
                 */
                init: function() {
                    var onInit = this.onInit;

                    jQuery(this.ctx).attr('data-moduleId', this.moduleId);
                    if (jQuery.isFunction(onInit)) {
                        this.onInit();
                    }
                },

                /**
                 * the start event chain, calls onStart of the module
                 */
                start: function() {
                    var onStart = this.onStart;
                    if (jQuery.isFunction(onStart)) {
                        this.onStart();
                    }
                },

                /**
                 * the stop event chain, calls onStop of the module
                 */
                stop: function() {
                    var onStop = this.onStop;
                    if (jQuery.isFunction(onStop)) {
                        this.onStop();
                    }
                }
            });
        }
    }
})(jQuery);