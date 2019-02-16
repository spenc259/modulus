import React from 'react'

export default function SlideItem(props) {
    return (
        <article className={ props.index + ' ' + "relative slide-item position" + props.index} style={{backgroundImage: `url(${props.item.url})`}}>
        </article>
    )
}