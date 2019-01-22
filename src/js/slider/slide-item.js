import React from 'react'

export default function SlideItem(props) {
    return (
        <article className={ props.index + ' ' + "relative carousel-item position" + props.index}>
            <img src={props.item.url} alt={props.item.title} />
        </article>
    )
}