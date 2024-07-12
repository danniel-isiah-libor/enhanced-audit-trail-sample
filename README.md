# Enhanced Audit Trail

The goal of this enhancement is to provide in depth logging details of each API activities across all services.

![Image.png](https://res.craft.do/user/full/c84a0691-0230-f7ac-8fa6-948c9725764e/doc/D6E9FB36-5F81-43D2-9E01-DFD2316F272A/B76906C6-A126-4C49-8676-0EF496DFB25B_2/RmDvGdeTdO1ltB9fVVINakKQ0e0Y19bpEfiA9TI4qH4z/Image.png)

**Tables**:

- requests - contains all information of client request and server response.
- queries - cotains all database query made each correlation.
- exceptions - contains all exception errors encountered each correlation.

**Save activity log:**
```json
"URL": "/logs",
"Method": "POST",
"Payload": {
    "correlation_id": ["Required", "UUID"],
    "service": ["Required", "String"],
    "merchant_uuid": ["Nullable", "UUID"],
    "user_uuid": ["Nullable", "UUID"],
    "user_type": ["Nullable", "String"],
    "ip": ["Required", "String"],
    "host": ["Required", "String"],
    "path": ["Required", "String"],
    "method": ["Required", "String"],
    "headers": ["Required", "Json"],
    "payload": ["Nullable", "Json"],
    "response_time": ["Required", "Numeric"],
    "memory_usage": ["Required", "Numeric"],
    "memory_peak_usage": ["Required", "Numeric"],
    "status": ["Required", "Numeric"],
    "response": ["Nullable", "Json"],
    "exception": ["Nullable", "Array"],
    "exception.message": ["Nullable", "String"],
    "exception.file": ["Nullable", "String"],
    "exception.line": ["Nullable", "Numeric"],
    "exception.trace": ["Nullable", "String"],
    "queries": ["Nullable", "Array"],
    "queries.*.query": ["Required", "String"],
    "queries.*.time": ["Required", "Numeric"]
}
```

**Search activity log:**
```json
"URL": "/logs/search",
"Method": "POST",
"Payload": {
    "correlation_id": ["Required", "UUID"],
    "page": ["Nullable", "Numeric"]
}
```

**TODO**:

- Smart search
- Publish it as package
