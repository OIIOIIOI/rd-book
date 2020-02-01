export default {
    call (options, thenCallback, alwaysCallback, errorCallback)
    {
        axios(options)
            .then(function (data)
            {
                if (thenCallback)
                    thenCallback(data)
            })
            .catch(function (error)
            {
                if (error.response)
                {
                    switch (error.response.status)
                    {
                        case 404:
                            console.warn(error);
                            return
                    }
                }
                if (errorCallback)
                    errorCallback(error)
            })
            .then(function ()
            {
                if (alwaysCallback)
                    alwaysCallback()
            })
    },
    getMarquee (thenCallback)
    {
        this.call({
            method: 'GET',
            url: '/resources/data/marquee.json?' + new Date().getTime(),
        }, thenCallback)
    },
    getCurrentGame (thenCallback)
    {
        this.call({
            method: 'GET',
            url: '/resources/data/current.json?' + new Date().getTime(),
        }, thenCallback)
    },
}