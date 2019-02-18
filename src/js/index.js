import React from 'react'
import ReactDOM from 'react-dom'

import Slider from './slider/slider'
import Gallery from './gallery/gallery'

ReactDOM.render(
    <Slider>
        <slide></slide>
    </Slider>,
    document.getElementById('slider')
)

ReactDOM.render(
    <Gallery />,
    document.getElementById('gallery')
)