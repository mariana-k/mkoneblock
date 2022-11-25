const EditComponent = () => {
    return (
      <div className="page-banner">
        <div className="page-banner__bg-image" style={{ backgroundImage: "url('/wp-content/themes/mkoneblock/images/library-hero.jpg')" }}></div>
        <div className="page-banner__content container t-center c-white">
          <h1 className="headline headline--large">Welcome!</h1>
          <h2 className="headline headline--medium">This is a tech blog.</h2>
          <h3 className="headline headline--small">
            Why don&rsquo;t you check out the <strong>article</strong> you&rsquo;re interested in?
          </h3>
          <a href="#" className="btn btn--large btn--blue">
            Learn More
          </a>
        </div>
      </div>
    )
  }

const SaveComponent = () => {
    return <p>This is from the block</p>
}

wp.blocks.registerBlockType('mkoneblock/banner', {
    title: 'Banner',
    edit: EditComponent,
    save: SaveComponent
})
