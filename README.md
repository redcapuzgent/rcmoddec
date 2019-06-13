# rcmoddec
REDCap module decorators

The following sections document the different parts of this libarary

## Redcap



### IExternalModule (interface)

Contains all public methods from REDCap's `ExternalModules\AbstractExternalModule` class.

This allows us to create decorators for REDCap modules

### AbstractExternalModuleDecorator

Is an abstract implementation of the IExternalModule interface that takes in a `ExternalModules\AbstractExternalModule` (as `$parent`) in its construct and implements all methods from `IExternalModule` by just returning the `$parent`original implementation.

The `__construct` method does not use a strict type declaration for `IExternalModule` because the real `$module` does not actually implement this interface.

## API

Decorators related to API access.

### TokenDecorator

Allows us to retrieve a token for a given user in the project so that the module can access the API.