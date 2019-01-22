import React, { Component } from 'react'
import axios from 'axios';

import SlideItem from './slide-item'

class Slider extends Component {

    constructor(props) {
        super(props)
        this.state = {
            slides: []
        }
        
        const appUrl = 'http://localhost/gmvaleting'; // Wordpress installation url

        this.slidesEndpoint = `${appUrl}/wp-json/acf/v3/options/options`; // Endpoint for getting Wordpress Pages
    }

    componentDidMount() {
        this.callApi(this.slidesEndpoint).then((response)=>{
            this.setState(
                {
                    slides: response.acf.build_a_row[0].pick_a_module[0].slider
                }
            )
        });
    }

    // Method for getting data from the provided end point url
    callApi(endPoint) {
        return new Promise((resolve, reject) => {
            axios.get(endPoint).then((response) => {
                resolve(response.data);
            }).catch((error) => {
                reject(error);
            }); 
        });     
    }

    render(){
        var slides = this.state.slides

        return (
            <div className="slider-inner">
                {
                    slides.map((slide, index) => (
                        <SlideItem item={slide} key={index} index={index} />
                    ))
                }
            </div>
        )
    }
} 

export default Slider
