# flux-eco/open-api-client

This component is supposed to assist in querying openapis.

## Functional Usage

```
fluxDotEnv\loadDotEnv(__DIR__);

$result = fluxOpenApiClient\query('/api/ilias/accounts', [], 'EXAMPLE_');
print_r($result); exit;
```

outputs:
```
Array
(
  [firstname] => Emmett
  [lastname] => Brown
  [lastChanged] => 2021-01-15T05:30:10+01:00
)
```

## Contributing :purple_heart:

Please ...

1. ... register an account at https://git.fluxlabs.ch
2. ... create pull requests :fire:

## Adjustment suggestions / bug reporting :feet:

Please ...

1. ... register an account at https://git.fluxlabs.ch
2. ... ask us for a Service Level Agreement: support@fluxlabs.ch :kissing_heart:
3. ... read and create issues
