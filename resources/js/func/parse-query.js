export const func_parse_query = (str) => {
    const gets = {}
    const params = str.split('&')

    for (let item of params) {
        item = item.split('=')

        if (item[0]) gets[item[0]] = item[1]
    }

    return gets
}