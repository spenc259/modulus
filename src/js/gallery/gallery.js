import React, { Component } from 'react'
import axios from 'axios';

import GalleryItem from './galleryItem'

export default class Gallery extends Component {

    constructor(props) {
        super(props)

        this.state = {
            images: []
        }
        const appUrl = 'http://localhost/gmvaleting';
        this.acfendpoint = `${appUrl}/wp-json/acf/v3/options/options`;
    }

    componentDidMount() {
        this.callApi(this.acfendpoint).then((response)=>{
            this.setState(
                {
                    images: response.acf.build_a_row[5].pick_a_module[1].gallery
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

    render() {
        
        return (
            <div className="grid-wrap">
                {
                    this.state.images.map((image, index) => (
                        
                        <div className={"grid-item-" + index} key={index}>
                            <GalleryItem src={image.sizes.large} alt={image.alt} />
                        </div>
                    ))
                }
            </div>
        )
    }
}