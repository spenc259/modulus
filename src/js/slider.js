import React, { Component } from 'react'

export default class Slider extends Component {
    constructor(props) {
        super(props)
        this.state = {
            photos: []
        }
    }

    render() {
        return (
            <section className="slider">
                Slider
            </section>
        )
    }
}