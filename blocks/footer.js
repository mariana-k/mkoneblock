wp.blocks.registerBlockType("mkoneblock/footer", {
  title: "Footer",
  edit: function () {
    return wp.element.createElement("div", { className: "placeholder-block" }, "Footer Placeholder")
  },
  save: function () {
    return null
  }
})
