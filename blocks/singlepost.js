wp.blocks.registerBlockType("mkoneblock/singlepost", {
  title: "Single Post",
  edit: function () {
    return wp.element.createElement("div", { className: "placeholder-block" }, "Single Post Placeholder")
  },
  save: function () {
    return null
  }
})
