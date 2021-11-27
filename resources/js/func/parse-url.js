export const func_parse_url = (str) => {
    const $url = new URL(str)

    return {
        scheme: $url.protocol + '//',
        host: $url.hostname,
        port: $url.port,
        user: $url.username,
        pass: $url.password,
        path: $url.pathname,
        query: $url.search.substr(1),
        fragment: $url.hash.substr(1),
    }
}