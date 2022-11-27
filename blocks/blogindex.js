wp.blocks.registerBlockType("mkoneblock/blogindex", {
  title: "Fictional University Blog Index",
  edit: function () {
    return wp.element.createElement("div", { className: "placeholder-block" }, "Blog Index Placeholder")
  },
  save: function () {
    return null
  }
})
