wp.blocks.registerBlockType("mkoneblock/blogindex", {
  title: "Blog Index",
  edit: function () {
    return wp.element.createElement("div", { className: "placeholder-block" }, "Blog Index Placeholder")
  },
  save: function () {
    return null
  }
})
