export const StatusCodePhrases: Record<
    number,
    { reason: string; description: string }
> = {
    400: {
        reason: "Bad Request",
        description: "Sorry, the request you made is invalid.",
    },
    401: {
        reason: "Unauthorized",
        description: "Sorry, you are not authorized to access this resource.",
    },
    402: {
        reason: "Payment Required",
        description: "Sorry, payment is required to access this resource.",
    },
    403: {
        reason: "Forbidden",
        description: "Sorry, you are not allowed to access this resource.",
    },
    404: {
        reason: "Not Found",
        description: "Sorry, the resource you are looking for is not found.",
    },
    405: {
        reason: "Method Not Allowed",
        description: "Sorry, the method you are using is not allowed.",
    },
    406: {
        reason: "Not Acceptable",
        description:
            "Sorry, the resource is not available in the format you requested.",
    },
    407: {
        reason: "Proxy Authentication Required",
        description: "Sorry, you need to authenticate with the proxy.",
    },
    408: {
        reason: "Request Timeout",
        description: "Sorry, the request took too long to process.",
    },
    409: {
        reason: "Conflict",
        description:
            "Sorry, there was a conflict with the current state of the resource.",
    },
    410: {
        reason: "Gone",
        description: "Sorry, the resource is no longer available.",
    },
    411: {
        reason: "Length Required",
        description: "Sorry, the Content-Length header is required.",
    },
    412: {
        reason: "Precondition Failed",
        description: "Sorry, a precondition for the request failed.",
    },
    413: {
        reason: "Request Entity Too Large",
        description: "Sorry, the request entity is too large.",
    },
    414: {
        reason: "Request-URI Too Long",
        description: "Sorry, the request URI is too long.",
    },
    415: {
        reason: "Unsupported Media Type",
        description: "Sorry, the media type is not supported.",
    },
    416: {
        reason: "Requested Range Not Satisfiable",
        description: "Sorry, the range is not satisfiable.",
    },
    417: {
        reason: "Expectation Failed",
        description: "Sorry, the expectation failed.",
    },
    418: { reason: "I'm a teapot", description: "I am revolving around mars." },
    419: {
        reason: "Insufficient Space on Resource",
        description: "Sorry, there is insufficient space on the resource.",
    },
    420: { reason: "Method Failure", description: "Sorry, the method failed." },
    421: {
        reason: "Misdirected Request",
        description: "Sorry, the request was misdirected.",
    },
    422: {
        reason: "Unprocessable Entity",
        description: "Sorry, the entity could not be processed.",
    },
    423: { reason: "Locked", description: "Sorry, the resource is locked." },
    424: {
        reason: "Failed Dependency",
        description: "Sorry, the request failed due to a dependency.",
    },
    426: {
        reason: "Upgrade Required",
        description: "Sorry, an upgrade is required.",
    },
    428: {
        reason: "Precondition Required",
        description: "Sorry, a precondition is required.",
    },
    429: {
        reason: "Too Many Requests",
        description: "Sorry, too many requests were made.",
    },
    431: {
        reason: "Request Header Fields Too Large",
        description: "Sorry, the request header fields are too large.",
    },
    451: {
        reason: "Unavailable For Legal Reasons",
        description: "Sorry, the resource is unavailable for legal reasons.",
    },
    500: {
        reason: "Internal Server Error",
        description: "Sorry, there was an internal server error.",
    },
    501: {
        reason: "Not Implemented",
        description: "Sorry, the method is not implemented.",
    },
    502: { reason: "Bad Gateway", description: "Sorry, the gateway is bad." },
    503: {
        reason: "Service Unavailable",
        description: "Sorry, the service is unavailable.",
    },
    504: {
        reason: "Gateway Timeout",
        description: "Sorry, the gateway timed out.",
    },
    505: {
        reason: "HTTP Version Not Supported",
        description: "Sorry, the HTTP version is not supported.",
    },
    507: {
        reason: "Insufficient Storage",
        description: "Sorry, there is insufficient storage.",
    },
    511: {
        reason: "Network Authentication Required",
        description: "Sorry, network authentication is required.",
    },
};
