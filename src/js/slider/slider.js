import React, { Component } from 'react'
import axios from 'axios';

import SlideItem from './slide-item'
import SlideNav from './slide-nav'

class Slider extends Component {

    constructor(props) {
        super(props)
        this.state = {
            slides: [],
            currentIndex: 0,
            translateValue: 0
        }

        this.nextSlide = this.nextSlide.bind(this)
        this.prevSlide = this.prevSlide.bind(this)
        
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

    nextSlide() {
        if(this.state.currentIndex === this.state.slides.length - 1) {
            return this.setState({
              currentIndex: 0,
              translateValue: 0
            })
        }

        this.setState(prevState => ({
            currentIndex: prevState.currentIndex + 1,
            translateValue: prevState.translateValue + -(this.slideWidth())
        }))
    }
    
    slideWidth() {
        return document.querySelector('.slide-item').clientWidth
    }

    prevSlide() {
        if (this.state.currentIndex === 0) {
            return
        }

        this.setState(prevState => ({
            currentIndex: prevState.currentIndex - 1,
            translateValue: prevState.translateValue + +(this.slideWidth())
        }))
    }

    render(){
        var slides = this.state.slides

        return (
            <div className="slide-wrap">
                <div className="slider-inner"
                style={{
                transform: `translateX(${this.state.translateValue}px)`,
                transition: 'transform ease-out 0.45s'
                }}>
                    {
                        slides.map((slide, index) => (
                            <SlideItem item={slide} key={index} index={index} />
                        ))
                    }
                </div>
                <SlideNav direction="left" action={this.prevSlide} />
                <SlideNav direction="right" action={this.nextSlide} />
            </div>
            
        )
    }
} 

export default Slider
